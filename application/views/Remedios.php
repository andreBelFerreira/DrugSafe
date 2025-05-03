<div class="container mx-auto mt-10">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">Adicionar Remédio</h2>

    <?php if (!empty($erro)) : ?>
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
            <p><?= $erro; ?></p>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('Remedios/salvar'); ?>" method="post" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md space-y-4">
        <div class="flex flex-wrap gap-4">
            <input type="text" name="nome" placeholder="Nome do Remédio" class="p-3 border border-gray-300 rounded flex-1" required>

            <input type="text" name="descricao" placeholder="Descrição" class="p-3 border border-gray-300 rounded flex-1" required>

            <input type="date" name="validade" title="Data de validade" class="p-3 border border-gray-300 rounded flex-1" required>

            <input type="number" name="quantidade" placeholder="Quantidade" class="p-3 border border-gray-300 rounded flex-1" required>

            <input type="date" name="data_prescricao" title="Data da Prescrição" placeholder="Data da Prescrição" class="p-3 border border-gray-300 rounded flex-1" required>

            <input type="text" name="dosagem" placeholder="Dosagem (ex: 500mg 3x/dia)" class="p-3 border border-gray-300 rounded flex-1" required>

            <input type="text" name="medico_responsavel" placeholder="Nome do Médico Responsável" class="p-3 border border-gray-300 rounded flex-1" required>

            <!-- Busca de hospital -->
            <input type="text" id="busca-hospital" placeholder="Buscar Hospital" class="p-3 border border-gray-300 rounded flex-1">

            <input type="hidden" name="hospital_id" id="hospital_id">

            <div id="resultado-busca" class="w-full bg-white shadow rounded p-2 hidden"></div>

            <!-- Upload da receita -->
            <label class="block w-full text-gray-700">Upload da Receita Médica:</label>
            <input type="file" name="receita_imagem" accept="image/*" class="w-full p-3 border border-gray-300 rounded">

            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Salvar</button>
        </div>
    </form>
</div>

<script>
    const inputBusca = document.getElementById('busca-hospital');
    const divResultado = document.getElementById('resultado-busca');
    const inputHospitalId = document.getElementById('hospital_id');

    inputBusca.addEventListener('keyup', function() {
        const termo = inputBusca.value.trim();
        if (termo.length >= 2) {
            fetch("<?= site_url('Remedios/buscarHospitais'); ?>?q=" + termo)
                .then(response => response.json())
                .then(data => {
                    divResultado.innerHTML = '';
                    if (data.length > 0) {
                        divResultado.classList.remove('hidden');
                        data.forEach(hospital => {
                            const div = document.createElement('div');
                            div.textContent = hospital.nome;
                            div.classList.add('cursor-pointer', 'hover:bg-gray-100', 'p-2', 'rounded');
                            div.addEventListener('click', () => {
                                inputBusca.value = hospital.nome;
                                inputHospitalId.value = hospital.id;
                                divResultado.classList.add('hidden');
                            });
                            divResultado.appendChild(div);
                        });
                    } else {
                        divResultado.classList.add('hidden');
                    }
                });
        } else {
            divResultado.classList.add('hidden');
        }
    });
</script>