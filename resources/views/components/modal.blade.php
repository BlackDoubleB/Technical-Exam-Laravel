<div id="deleteModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center">
    <div class="bg-white p-6 rounded shadow">
        <p class="mb-4">¿Seguro que quieres eliminar este libro?</p>

        <div class="flex gap-3 justify-end">
            <button id="closeModal" type="button">Cancelar</button>
            <button type="button" id="confirmDelete" class="bg-red-500 text-white px-3 py-1 rounded">
                Eliminar
            </button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let modal = document.querySelector('#deleteModal');
        let form = document.querySelector('#deleteRegister');
        
        //Motrar Modal
        document.querySelectorAll('.btnDelete').forEach(button => {
            button.addEventListener('click', function () {
                modal.classList.remove('hidden');
            });
        });

        //Cerrar modal y cancelar
        document.getElementById('closeModal').addEventListener('click', function () {
            modal.classList.add('hidden');
        });

        //Cerrar modal y eliminar
         document.getElementById('confirmDelete').addEventListener('click', function () {
            form.submit();
            modal.classList.add('hidden');
        });
    });
</script>
