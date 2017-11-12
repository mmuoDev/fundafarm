function markAsReadFxn(notify_id){
    $.get('/markAsRead/'+notify_id);
}