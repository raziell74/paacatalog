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
          self.find('i').removeClass('remove').addClass('expand').html('+');
          sectionCollapsables.addClass('hide');
        } else {
          self.find('i').removeClass('expand').addClass('remove').html('-');
          sectionCollapsables.removeClass('hide');
        }
    });
});