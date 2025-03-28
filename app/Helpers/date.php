<?php

use Carbon\Carbon;
use Illuminate\Support\Str;

function formatDate($dt)
{
    return Carbon::parse($dt)->format('M d, Y');
}

function formatDateHour($dt)
{
    return Carbon::parse($dt)->format('g:i A');
}

function limitWords($phrase, $limit, $last)
{
    return Str::limit($phrase, $limit, $last);
}

function getSlug($phrase)
{
    return Str::slug($phrase);
}

function getKeywordsFromSlug($phrase, $rep)
{
    $articles = ["a-", "the-", "of-", "with-", "in-", "at-", "on-", "above-", "up-", "below-", "or-", "and-"];
    $blanks   = ["", "", "", "", "", "", "", "", "", "", "", ""];
    $texts = str_replace($articles, $blanks, $phrase);
    return str_replace("-", $rep, $texts);   
}

function getNewBody($post)
{
    $img = '<img src="'. $post->image . '" class="w-1/2 object-center mb-5" alt="Image for '. $post->title . '">';
    $video = '<iframe class="w-full h-96 md:w-1/2" src="'.$post->video.'"></iframe>';
    $links = ["[image]", "[video]", "[audio]"];
    $new   = [$img, $video, ""];
    return str_replace($links, $new, $post->body);
}

function replaceTemporary($body)
{
    return str_replace(["[image]", "[video]", "[audio]"], ["","",""], $body);
}
