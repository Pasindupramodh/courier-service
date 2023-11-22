function msg(msgType, msgStr) {
    var example = $('#example');
    switch (example.attr('data-icon')) {
        case 'fa':
            Msg.icon = Msg.ICONS.FONTAWESOME;
            break;

        case 'bs':
            Msg.icon = Msg.ICONS.BOOTSTRAP;
            break;

        default:
            Msg.icon = {
                info: 'fa fa-bath',
                success: 'fa fa-check-circle',
                warning: 'fa fa-bell-o',
                danger: 'fa fa-bolt'
            };
    }


    Msg[msgType](msgStr);

}