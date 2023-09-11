

function searchData(management) {
  const query = $('.search').val();
  window.location.href = '/' + management + '/?search=' + encodeURIComponent(query);
}