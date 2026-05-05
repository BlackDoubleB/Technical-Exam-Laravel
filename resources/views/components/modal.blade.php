<div id="deleteModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50">
    
    <div class="bg-white w-full max-w-sm p-6 rounded-2xl shadow-2xl border border-gray-200">
        
        <h2 class="text-lg font-semibold text-gray-800 mb-2">
            Confirmar eliminación
        </h2>

        <p class="mb-6 text-sm text-gray-500">
            ¿Seguro que quieres eliminar este libro? Esta acción no se puede deshacer.
        </p>

        <div class="flex gap-3 justify-end">
            
            <button id="closeModal" type="button"
                class="px-4 py-2 text-sm rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 transition duration-200">
                Cancelar
            </button>

            <button type="button" id="confirmDelete"
                class="px-4 py-2 text-sm rounded-lg bg-red-500 text-white hover:bg-red-600 transition duration-200 shadow-sm">
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