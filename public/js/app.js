// small helpers using jQuery (no build step required)
$(function(){
  // confirmation for forms with data-confirm attribute
  $(document).on('submit', 'form[data-confirm]', function(e){
    var msg = $(this).data('confirm') || 'Are you sure?';
    if (!confirm(msg)) {
      e.preventDefault();
    }
  });

  // attach simple AJAX example for API usage (optional)
  // Example usage:
  // $.post('/api/articles', { title: 'Hi', body: '...' }, function(resp){ console.log(resp); });
});