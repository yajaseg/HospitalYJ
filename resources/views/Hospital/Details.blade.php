@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card col-md-12">
                <div class="card-body">
                    <h5 class="card-title">{{ $hospitals->Name }}</h5>
                    
                </div>
                <div id="starRating" class="card-footer">
                    <p>Rating: </p>
                    <span class="fa-2x text-warning">
                        <i class="far fa-star" onclick="setStarRating(2)" onmouseleave="starRating(document.getElementById('ratingval').value);" onmouseover="starRating(2);"></i>
                    </span>
                    <span class="fa-2x text-warning">
                        <i class="far fa-star" onclick="setStarRating(4)" onmouseleave="starRating(document.getElementById('ratingval').value);" onmouseover="starRating(4);"></i>
                    </span>
                    <span class="fa-2x text-warning">
                        <i class="far fa-star" onclick="setStarRating(6)" onmouseleave="starRating(document.getElementById('ratingval').value);" onmouseover="starRating(6);"></i>
                    </span>
                    <span class="fa-2x text-warning">
                        <i class="far fa-star" onclick="setStarRating(8)" onmouseleave="starRating(document.getElementById('ratingval').value);" onmouseover="starRating(8);"></i>
                    </span>
                    <span class="fa-2x text-warning">
                        <i class="far fa-star" onclick="setStarRating(10)" onmouseleave="starRating(document.getElementById('ratingval').value);" onmouseover="starRating(10);"></i>
                    </span>
                    @php
                        $rating = (array)$hospitals->rating;
                        if (count($rating) == 0)
                            $avg = 0;
                        else
                            $avg = array_sum($rating) / count($rating);
                    @endphp

                    <input type="number" name="ratingval" id="ratingval" min="0" max="10" hidden value="{{ $avg }}">
                </div>
            </div>
            <div class="col-md-12">
                <h1>Add a Comment</h1>
                <form action="{{ route('HospitalComment') }}" method="POST">
                    @csrf
                    <input type="hidden" name="hospitalid" id="hospitalid" value="{{ $hospitals->_id->__toString() }}">
                    
                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea class="form-control" name="comment" id="comment" cols="30" rows="4"></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Add comment</button>
                </form>
            </div>
            <div class="col-md-12">
                <h1>User comments</h1>
                @if (count($hospital->comments) == 0 || $hospital->comments == null || empty($hospital->comments) )
                        <h1>No comments yet.</h1>
                @else
                    @foreach($hospital->comments as $comment)
                    <div class="card col-md-12">
                        <div class="card-body">
                           
                            <p class="card-text">{{ $comment->comment }}</p>
                            <p class="card-text">Date published: {{ $comment->date }} UTC</p>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <script>
        function starRating(rating) {
            var elStars = document.getElementById("starRating").getElementsByTagName("i");
            for (var i = 0; i < elStars.length; i++) {
                elStars[i].setAttribute("class", "far fa-star");
            }
            for (i = 1; i <= Math.ceil(rating/2); i++){
                let elStar = elStars[i - 1];
                if (i == Math.ceil(rating/2) && rating % 2 == 1){
                    elStar.setAttribute("class", "fas fa-star-half-alt")
                } else {
                    elStar.setAttribute("class", "fas fa-star")
                }
            }
        }
        function setStarRating(rating){
            const prodID = "{{ $product->_id }}"
            var formData = {
                id: prodID,
                rating: rating
            }
            axios.post("/api/rating",formData)
                .then(function (response) {
                    document.getElementById("ratingval").value = response.data.avg;
                    starRating(response.data.avg);
                })
                .catch(function (error) {
                    console.log(error);
                })
        }
        (function () {
            starRating(document.getElementById("ratingval").value);
        })();
    </script>
@endsection