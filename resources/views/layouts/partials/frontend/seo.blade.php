@isset($seo)
    <title>{{$seo->title}} - {{env('SITE_URL', 'Site Name')}}</title>
    <meta name='description' itemprop='description' content='{{$obj->description}}'/>
    <meta name='keywords' content='{{implode(', ', $seo->tags)}}'/>

    <meta property="og:description" content="{{$seo->description}}"/>
    <meta property="og:title" content="{{$seo->title}}"/>
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:locale" content="en-us"/>
    <meta property="og:locale:alternate" content="en-us"/>
    <meta property="og:site_name" content="{{env('SITE_URL', 'Site Name')}}"/>

    <meta property="og:image" content="{{$seo->image}}"/>

    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="{{$obj->title}}"/>
@endisset
