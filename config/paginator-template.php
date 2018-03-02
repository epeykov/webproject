<?php
return [
'prevActive' => '<li><a class="button big previous" rel="prev" href="{{url}}">{{text}}</a></li>',
'prevDisabled' => '<li><a class="button big previous" href="" onclick="return false;">{{text}}</a></li>',
'nextActive' => '<li><a class="button big next" rel="next" href="{{url}}">{{text}}</a></li>',
'nextDisabled' => '<li><a class="button big next disabled" href="" onclick="return false;">{{text}}</a></li>',
'counterPages' => '<li><a class="button big">{{page}}/{{pages}}</a></li>',
'number' => '<li><a  class="button big next" href="{{url}}">{{text}}</a></li>',
'current' => '<li><a class="button big active" href="">{{text}}</a></li>',
'counterPages' => '<li><a class="button big active">{{page}}'.__("/").'{{pages}}</a></li>',
];

