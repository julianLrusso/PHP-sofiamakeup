document.addEventListener('DOMContentLoaded', function(){
    const form = document.querySelectorAll('.form-eliminar');
    form.forEach(elem => {
        elem.addEventListener('submit',function(ev) {
            const confirmado = confirm('¿Seguro que quiere eliminar el producto?');
            if(!confirmado) {
                ev.preventDefault();
            }
        });
    });
});