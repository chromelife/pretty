<!DOCTYPE html>
<html class="site no-js" lang="en">
<head>

  <meta charset="utf-8"/>
  <title>Crappy CMS</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <link href='http://fonts.googleapis.com/css?family=Playfair+Display:900,400|Lato:300,400,700' rel='stylesheet' type='text/css'>
  <link href="/css/style.css" rel="stylesheet" type="text/css" media="all" />
  <link href="/css/medium-editor.css" rel="stylesheet" type="text/css" media="all" />
  <style>
    table form { margin-bottom: 0; }
    form ul { margin-left: 0; list-style: none; }
    .error { color: red; font-style: italic; }
    body { padding-top: 20px; }
  </style>


</head>

<body class="section">

  <tr>
    <td><a href="../pages">Pages</a></td>
    <td><a href="../images">Images</a></td>
    <td><a href="../posts">Posts</a></td>
    <td><a href="../logout">Logout</a></td>
    <tr>
      <div id="canvas">

        @yield('main')

        <div id="page-overlay">
        </div><!-- #nav-img -->

      </div><!-- #page-overlay -->

    </div><!-- #canvas -->

    @include('partials.editor')


  </body>
  </html>
