@extends('blog.layouts.app')

@section('content')
  <main id="main">
    <section>
      <div class="container">
        <div class="row" id="article">
       
        </div>
      </div>
    </section>
  </main><!-- End #main -->
@endsection

@section('script')
  <script>
    // Get method page value 
    var page = window.location.href.split('?page=')[1];
    if (page == undefined) {
      page = 1;
    }
    console.log(page);

    // Get all articles from API
    $.ajax({
      url: '{{ URL('api/v1/articles/paginate/5') }}?page=' + page,
      type: 'GET',
      dataType: 'json',
      success: function (data) {
        console.log(data);
        var article = data.data;
        var html = '';
        var pagination = '';

        for (var i = 0; i < article.length; i++) {
          html += '<div class="col-lg-4 col-md-6 mb-4">';
          html += '<div class="card h-100">';
          html += '<img class="card-img-top" src="' + article[i].image + '" alt="Article Image">';
          html += '<div class="card-body">';
          html += '<h5 class="card-title"><a href="{{ url('articles') }}/' + article[i].id + '" class="text-decoration-none text-dark">' + article[i].title + '</a></h5>';
          html += '<p class="card-text">' + article[i].content.substring(0, 100) + '...</p>';
          html += '<div class="d-flex justify-content-between align-items-center">';
          html += '<small class="text-muted">' + new Date(article[i].created_at).toLocaleDateString('id-ID') + '</small>';
          html += '<span class="badge bg-secondary">' + article[i].categories.name + '</span>';
          html += '</div>';
          html += '</div>';
          html += '<div class="card-footer">';
          html += '<div class="d-flex align-items-center">';
          html += '<img src="assets/img/profile.png" alt="Author Image" class="img-fluid rounded-circle" width="30" height="30">';
          html += '<small class="ms-2 text-dark">' + article[i].user.name + '</small>';
          html += '</div>';
          html += '</div>';
          html += '</div>';
          html += '</div>';
        }

        // If no articles found, show alert
        if (article.length == 0) {
          html += '<div class="col-md-12 text-center">';
          html += '<div class="alert alert-danger" role="alert">Page Not Found!</div>';
          html += '</div>';
        } else {
          // Pagination
          pagination += '<div class="text-center py-4">';
          pagination += '<nav aria-label="Page navigation">';
          pagination += '<ul class="pagination justify-content-center">';

          // Previous Page
          if (data.prev_page_url == null) {
            pagination += '<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>';
          } else {
            var prev = data.prev_page_url.split('?page=')[1];
            pagination += '<li class="page-item"><a class="page-link" href="{{ url('') }}?page=' + prev + '">Previous</a></li>';
          }

          // Page Numbers
          for (var i = 1; i <= data.last_page; i++) {
            if (data.current_page == i) {
              pagination += '<li class="page-item active "><a class="page-link bg-primary" href="{{ url('') }}?page=' + i + '">' + i + '</a></li>';
            } else {
              pagination += '<li class="page-item "><a class="page-link " href="{{ url('') }}?page=' + i + '">' + i + '</a></li>';
            }
          }

          // Next Page
          if (data.next_page_url == null) {
            pagination += '<li class="page-item disabled"><a class="page-link" href="#">Next</a></li>';
          } else {
            var next_page = data.next_page_url.split('?page=')[1];
            pagination += '<li class="page-item"><a class="page-link" href="{{ url('') }}?page=' + next_page + '">Next</a></li>';
          }

          pagination += '</ul>';
          pagination += '</nav>';
          pagination += '</div>';
        }

        $('#article').html(html + pagination);
      }
    });
  </script>
@endsection
