$(document).ready(function(){
    var toastHTML = '<span>A new version is available</span><a href="#" class="btn-flat toast-action">Update Now</a>';
    toastInstance = M.toast({
        html: toastHTML,
        classes: 'green white-text pulse',
        displayLength: 60000
    });
});