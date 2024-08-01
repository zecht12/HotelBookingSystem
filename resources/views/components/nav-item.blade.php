@props(['label','icon','link'])
<?php
$path = trim(Str::replace(url('/'),"",$link,'/'));
$wildchar = route('dashboard') == url()->current() ? '':'*';
$is = request()->is($wildchar.$path);
?>
<li class="nav-item">
    <a href="<?= $link ?>" class="nav-link {{$is ? 'active':''}}">
        <i class="nav-icon {{$icon}}"></i>
        <span>{{$label}}</span>
    </a>
</li>