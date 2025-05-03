
    <header class="bg-white shadow-sm w-full">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between">
            <h1 class="text-xl font-bold text-blue-700">Hospitais Cadastrados</h1>
            <a href="<?= site_url('hospital/cadastrar') ?>" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">Adicionar Hospital</a>
        </div>
    </header>

    <main class="max-w-5xl mx-auto mt-10 p-4">
        <div class="bg-white p-6 rounded-xl shadow-md">
            <?php if (empty($hospitais)): ?>
                <p class="text-gray-600">Nenhum hospital cadastrado.</p>
            <?php else: ?>
                <ul class="space-y-4">
                    <?php foreach ($hospitais as $hospital): ?>
                        <li class="border-b py-2 text-gray-800">
                            <strong><?= htmlspecialchars($hospital['nome'], ENT_QUOTES, 'UTF-8') ?></strong> - <?= htmlspecialchars($hospital['endereco'], ENT_QUOTES, 'UTF-8') ?>
                            <br>
                            <span class="text-sm text-gray-600">Tel: <?= htmlspecialchars($hospital['telefone'], ENT_QUOTES, 'UTF-8') ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </main>
