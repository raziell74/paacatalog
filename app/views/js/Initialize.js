$(document).ready(function(){
    $('.sidenav').sidenav();
    $('.parallax').parallax();
    $('.modal').modal();
    $('.tabs').tabs();

    $('.section-collapse-button').click(function(evnt){
        var self = $(this),
            sectionCssId = self.attr('data-css-id')
            sectionCollapsables = $('.section-collapse-' + sectionCssId);

        self.toggleClass('collapsed');
        if(self.hasClass('collapsed')) {
          self.find('i').html('add');
          sectionCollapsables.addClass('hide');
        } else {
          self.find('i').html('remove');
          sectionCollapsables.removeClass('hide');
        }
    });
});