<div class="container mx-auto mt-10">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">Interações com Médico</h2>

    <button onclick="document.getElementById('formInteracao').classList.toggle('hidden')" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 mb-4">
        Adicionar Nova Interação
    </button>

    <div id="formInteracao" class="hidden bg-white p-6 rounded-lg shadow space-y-4 mb-6">
        <form action="<?= site_url('interacao/salvar'); ?>" method="post">
            <div class="card-body row">
                <?php echo form_open('interacao/salvar'); ?>
                <div class="mb-3 col-4">
                    <label for="data_interacao" class="form-label">Data da Interação</label>
                    <input type="date" class="form-control" id="data_interacao" name="data_interacao" required>
                </div>

                <div class="mb-3 col-4">
                    <label for="remedio_id" class="form-label">Remédio</label>
                    <select class="form-select" id="remedio_id" name="remedio_id" required>
                        <option value="">Selecione o remédio</option>
                        <?php foreach ($remedios as $remedio) { ?>
                            <option value="<?php echo $remedio['id']; ?>"><?php echo $remedio['nome']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3 col-4">
                    <label for="medico" class="form-label">Médico Responsável</label>
                    <input type="text" class="form-control" id="medico" name="medico" required>
                </div>

                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição da Interação</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Salvar Interação</button>
                <?php echo form_close(); ?>
            </div>
        </form>
    </div>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left">Remédio</th>
                    <th class="px-6 py-3 text-left">Interação</th>
                    <th class="px-6 py-3 text-left">Data</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach ($interacoes as $i): ?>
                    <tr>
                        <td class="px-6 py-4"><?= $i['nome_remedio']; ?></td>
                        <td class="px-6 py-4"><?= $i['interacao']; ?></td>
                        <td class="px-6 py-4"><?= date('d/m/Y', strtotime($i['data'])); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    // Toggle do formulário de interação
</script>