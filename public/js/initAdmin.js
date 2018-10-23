var defaultMCESettings = {
    selector: 'textarea',
    height: 500,
    menubar: false,
    plugins: [
        'advlist autolink lists link image charmap print preview anchor textcolor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table contextmenu paste code help wordcount'
    ],
    toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
    content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css'
    ]
};

function applyTinyMCE(settings){
    tinymce.init(settings);
    setTimeout(function(){
        $('.mce-widget.mce-notification.mce-notification-warning').remove();
    }, 200);
    setTimeout(function(){
        $('.mce-widget.mce-notification.mce-notification-warning').remove();
    }, 400);
    setTimeout(function(){
        $('.mce-widget.mce-notification.mce-notification-warning').remove();
    }, 600);
    setTimeout(function(){
        $('.mce-widget.mce-notification.mce-notification-warning').remove();
    }, 800);
    setTimeout(function(){
        $('.mce-widget.mce-notification.mce-notification-warning').remove();
    }, 1000);
}