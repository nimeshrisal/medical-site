<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Docmed Admin</title>

    <link rel="icon" href="">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('/skydash/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('/skydash/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/skydash/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('/skydash/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/nepali.datepicker.v3.7.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('/skydash/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/skydash/vendors/mdi/css/materialdesignicons.min.css') }}">
    <!-- End plugin css for this page -->
    <link rel="stylesheet" href="https://www.bootstrapdash.com/demo/skydash/template/vendors/dropify/dropify.min.css">
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('/skydash/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="stylesheet" href="{{ asset('/stylesheets/style.min.css') }}">
    <link rel="stylesheet" media="print" href="{{ asset('/stylesheets/print.css') }}">
</head>

<body>
    <div class="container-scroller">
