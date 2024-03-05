<?php

require_once("models/Review.php");
require_once("models/Message.php");
require_once("dao/UserDAO.php");

class ReviewDAO implements ReviewDAOInterface
{
    private $conn;
    private $url;
    private $message;

    public function __construct($conn, $url)
    {
        $this->conn = $conn;
        $this->url = $url;
        $this->message = new Message($url);
    }

    public function buildReview($data)
    {
        $review = new Review();
        $review->id = $data['id'];
        $review->rating = $data['rating'];
        $review->review = $data['review'];
        $review->user_id = $data['user_id'];
        $review->movies_id = $data['movies_id'];

        return $review;
    }

    public function create(Review $review)
    {

    }

    public function getMoviesReview($id)
    {

    }

    public function hasAlreadyReviewed($id, $userId)
    {

    }

    public function getRatings($id)
    {

    }
}