<?php


namespace App\Tweets;


use App\Tweet;

class EntityExtractor
{
    protected $tweet;
    const PREGEX = '/#([\p{Pc}\p{N}\p{L}\p{Mn}]+)/u';
    const metionPREGEX = '/(?=[^\w!])@(\w+)\b/';
    public function __construct( $tweet)
    {
        $this->tweet = $tweet;
    }
    public function getAllEntites(){
        return array_merge($this->getHashtagFromTweet(),$this->getMentionsFromTweet());
    }

    public function getMentionsFromTweet(){
        return $this->buildEntityArray($this->match(self::metionPREGEX),
        EntityType::MENTION
        );
    }

    public function getHashtagFromTweet(){

        return $this->buildEntityArray($this->match(self::PREGEX),
        EntityType::HASHTAG
        );
    }

    protected function buildEntityArray ($entities,$type){
        return array_map(function ($entity,$index) use ($entities,$type){
            return [
                'body' => $entity[0],
                'body_plain' => $entities[1][$index][0],
                'type' => $type,
                'start' => $start = $entity[1],
                'end'=> $start + strlen($entity[0])

            ];

        },$entities[0],array_keys($entities[0]));
    }

    protected function match ($pattren){
        preg_match_all($pattren, $this->tweet, $matches, PREG_OFFSET_CAPTURE);
        return $matches;

    }
}
