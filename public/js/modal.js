        const openModalButton = document.getElementById('openModalButton');
        const closeModalButton = document.getElementById('closeModalButton');
        const modal = document.getElementById('myModal');
        const modalOverlay = document.getElementById('modalOverlay');

        openModalButton.addEventListener('click', () => {
            modal.classList.remove('hidden');
            modalOverlay.classList.remove('hidden');
        });

        closeModalButton.addEventListener('click', () => {
            modal.classList.add('hidden');
            modalOverlay.classList.add('hidden');
        });