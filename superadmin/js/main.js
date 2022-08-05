



function error($msg){
    $html = ' <div class="alert alert-danger alert-dismissible fade show" role="alert">';
    $html += '<span class="alert-icon"><i class="fas fa-thumbs-down mr8"></i></span>';
    $html += '<span class="alert-text"><strong>Error! </strong> '+$msg+'</span>';
    $html += '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">';
    $html += '   <span aria-hidden="true">&times;</span>';
    $html += '</button>';
    $html += '</div>';
    return $html;
}

function success($msg){
    $html = ' <div class="alert alert-success alert-dismissible fade show" role="alert">';
    $html += '<span class="alert-icon"><i class="ni ni-like-2 mr8"></i></span>';
    $html += '<span class="alert-text"><strong>Success! </strong> '+$msg+'</span>';
    $html += '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">';
    $html += '   <span aria-hidden="true">&times;</span>';
    $html += '</button>';
    $html += '</div>';
    return $html;
}