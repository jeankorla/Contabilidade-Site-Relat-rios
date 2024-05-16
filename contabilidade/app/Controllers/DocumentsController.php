<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\Cliente_lead;
use App\Models\Empresa;
use App\Models\Atividade;
use App\Models\Contabilidade;
use App\Models\Socio;
use App\Models\Socio_ass;
use App\Models\Documents;

class DocumentsController extends BaseController
{
    public function showDocuments($id = null)
    {
        $clienteModel = new Cliente_lead();
        $cliente = $clienteModel->find($id);

        if (!$cliente) {
            return redirect()->back()->with('error', 'Cliente não encontrado.');
        }

        $empresaModel = new Empresa();
        $empresa = $empresaModel->where('cliente_id', $id)->first();

        $empresaId = $empresa ? $empresa['id'] : null;

        $atividadeModel = new Atividade();
        $atividades = $atividadeModel->where('empresa_id', $empresaId)->findAll();

        $contabilidadeModel = new Contabilidade();
        $contabilidade = $contabilidadeModel->where('empresa_id', $empresaId)->first();

        $socioModel = new Socio();
        $socios = $socioModel->where('empresa_id', $empresaId)->findAll();

        $socio_assModel = new Socio_ass();
        $socio_asses = $socio_assModel->where('empresa_id', $empresaId)->first();

        $documentsModel = new Documents();
        $documents = $documentsModel->where('empresa_id', $empresaId)->first();
        

        $data = [
            'cliente' => $cliente,
            'empresa' => $empresa,
            'atividades' => $atividades,
            'contabilidade' => $contabilidade,
            'socios' => $socios,
            'socio_asses' => $socio_asses,
            'documents' => $documents,
        ];

        return view('showDocuments', ['data' => $data]);
    }

    public function formView($id = null)
    {
        $clienteModel = new Cliente_lead();
        $cliente = $clienteModel->find($id);

        if (!$cliente) {
            return redirect()->back()->with('error', 'Cliente não encontrado.');
        }

        $empresaModel = new Empresa();
        $empresa = $empresaModel->where('cliente_id', $id)->first();

        $empresaId = $empresa ? $empresa['id'] : null;

        $atividadeModel = new Atividade();
        $atividades = $atividadeModel->where('empresa_id', $empresaId)->findAll();

        $contabilidadeModel = new Contabilidade();
        $contabilidade = $contabilidadeModel->where('empresa_id', $empresaId)->first();

        $socioModel = new Socio();
        $socios = $socioModel->where('empresa_id', $empresaId)->findAll();

        $socio_assModel = new Socio_ass();
        $socio_asses = $socio_assModel->where('empresa_id', $empresaId)->first();

        $documentsModel = new Documents();
        $documents = $documentsModel->where('empresa_id', $empresaId)->first();
        

        $data = [
            'cliente' => $cliente,
            'empresa' => $empresa,
            'atividades' => $atividades,
            'contabilidade' => $contabilidade,
            'socios' => $socios,
            'socio_asses' => $socio_asses,
            'documents' => $documents,
        ];

        return view('documents', ['data' => $data]);
    }


    public function storeDocuments($id = null)
    {
        helper('text');
        $empresaModel = new Empresa();
        $documentModel = new Documents();

        $empresa = $empresaModel->find($id);
        if (!$empresa) {
            return redirect()->back()->with('error', 'Empresa não encontrada.');
        }

        $cnpj = preg_replace('/[^0-9]/', '', $empresa['cnpj']);
        $dirPath = './documents/' . $cnpj;

        if (!is_dir($dirPath) && !mkdir($dirPath, 0755, true)) {
            log_message('error', "Falha ao criar o diretório: $dirPath");
            return redirect()->back()->with('error', 'Falha ao criar diretório para documentos.');
        }

        $files = $this->request->getFiles();
        $existingDocument = $documentModel->where('empresa_id', $id)->first();

        if ($existingDocument) {
            $data = ['id' => $existingDocument['id']]; // Usando o ID do registro existente para atualização
        } else {
            $data = ['empresa_id' => $id]; // Criando um novo registro se não existir
        }

        foreach ($files as $fileKey => $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                if (!$file->move($dirPath, $newName)) {
                    log_message('error', "Falha ao mover o arquivo $fileKey");
                    continue; // Não interrompe o loop, tenta processar os próximos arquivos
                }
                $data[$fileKey] = $dirPath . '/' . $newName;
            }
        }

        // Salvar ou atualizar os dados no banco
        if (!$documentModel->save($data)) {
            log_message('error', 'Falha ao salvar os dados do documento no banco de dados.');
            return redirect()->back()->with('error', 'Falha ao salvar os documentos.');
        }

        return redirect()->to('/some/route')->with('success', 'Arquivos carregados com sucesso.');
    }


   public function deleteDocument()
{
    $json = $this->request->getJSON();
    $docKey = $json->docKey;
    $empresaId = $json->empresaId;
    $email = $json->email ?? null;
    $reason = $json->reason ?? '';
    $notify = $json->notify ?? false;

    $documentModel = new Documents();
    $document = $documentModel->where('empresa_id', $empresaId)->first();

    if (!$document) {
        return $this->response->setJSON(['success' => false, 'message' => 'Documento não encontrado.']);
    }

    if (empty($document[$docKey])) {
        return $this->response->setJSON(['success' => false, 'message' => 'Arquivo não encontrado ou já excluído.']);
    }

    if (file_exists($document[$docKey])) {
        unlink($document[$docKey]);
    }

    $updateData = [$docKey => null];
    if ($documentModel->update($document['id'], $updateData)) {
        if ($notify && $email) {
            $this->sendNotificationEmail($email, $document[$docKey], $reason);
        }
        return $this->response->setJSON(['success' => true, 'message' => 'Documento excluído com sucesso.']);
    }

    return $this->response->setJSON(['success' => false, 'message' => 'Falha ao atualizar o registro.']);
}

private function sendNotificationEmail($email, $documentName, $reason) {
    $emailService = \Config\Services::email();
    $emailService->setFrom('controladoria@sccontab.com.br', 'Controladoria');
    $emailService->setTo($email);
    $emailService->setSubject('Notificação de Exclusão de Documento');
    $emailService->setMessage("O documento '{$documentName}' foi excluído. Motivo: {$reason}");
    if (!$emailService->send()) {
        // Considerar logar essa falha ou tomar outra ação
    }
}



}