$(document).ready(function(){
    $('.section-edit').click(function(evnt){
        var sectionId = $(this).attr('data-section'),
            sectionPreview = $('#' + sectionId)
            sectionEditors = $('#' + sectionId + '-edit');
        sectionPreview.addClass('hide');
        sectionEditors.removeClass('hide');

        sectionMCESettings = defaultMCESettings;
        sectionMCESettings.selector = '#' + sectionId + '-edit textarea';
        applyTinyMCE(sectionMCESettings);
    });

    $('.section-cancel-edit').click(function(evnt){
        var sectionId = $(this).attr('data-section'),
            sectionPreview = $('#' + sectionId)
            sectionEditors = $('#' + sectionId + '-edit');
        sectionPreview.removeClass('hide');
        sectionEditors.addClass('hide');
    });

    $('.section-delete').click(function(evnt){
        var sectionId = $(this).attr('data-section');
        if(confirm("This will permanently delete this section and all products listed under this section. \n\n Are you sure you want to proceed?")) {
            window.location.href = "/delete/section/" + sectionId;
        }
    });

    $('.footer-edit').click(function(evnt){
        $('.footer-admin').removeClass('hide');
        $('#footer').addClass('hide');
    });

    $('.footer-cancel-edit').click(function(evnt){
        $('.footer-admin').addClass('hide');
        $('#footer').removeClass('hide');
    });
});