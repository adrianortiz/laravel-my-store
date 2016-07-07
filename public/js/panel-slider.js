$(".form-slider-destroy").submit(function(e){
    if (!confirm("Está acción no se puede deshacer."))
    {
        e.preventDefault();
        return;
    }
});