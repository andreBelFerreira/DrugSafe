<div class="container mx-auto mt-10">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">Dashboard de Remédios</h2>

    <!-- Alerta de remédio vencido -->
    <?php if (!empty($alertaVencidos)) : ?>
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6">
            <p><strong>Atenção:</strong> Existem remédios vencidos!</p>
        </div>
    <?php endif; ?>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left">Nome</th>
                    <th class="px-6 py-3 text-left">Descrição</th>
                    <th class="px-6 py-3 text-left">Validade</th>
                    <th class="px-6 py-3 text-left">Quantidade</th>
                    <th class="px-6 py-3 text-left">Hospital Vinculado</th> <!-- ALTERADO AQUI -->
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach ($remedios as $remedio): ?>
                    <tr>
                        <td class="px-6 py-4"><?= htmlspecialchars($remedio['nome'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td class="px-6 py-4"><?= htmlspecialchars($remedio['descricao'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td class="px-6 py-4"><?= date('d/m/Y', strtotime($remedio['validade'])); ?></td>
                        <td class="px-6 py-4"><?= htmlspecialchars($remedio['quantidade'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td class="px-6 py-4">
                            <?= !empty($remedio['hospital_nome']) ? htmlspecialchars($remedio['hospital_nome'], ENT_QUOTES, 'UTF-8') : '<span class="text-gray-400 italic">Não vinculado</span>'; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>