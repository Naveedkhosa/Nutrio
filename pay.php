<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <!-- Moyasar Styles -->
  <link rel="stylesheet" href="https://cdn.moyasar.com/mpf/1.13.0/moyasar.css" />
  <!-- Moyasar Scripts -->
  <script src="https://cdn.moyasar.com/mpf/1.13.0/moyasar.js"></script>

</head>
<body>
<div class="mysr-form"></div>
<script>
  Moyasar.init({
    element: '.mysr-form',
    amount: 100,
    currency: 'USD',
    description: 'Coffee Order #1',
    publishable_api_key: 'pk_test_jwZrUJrCuTcKDQ2pLBdwz6UaMuYdCwFo5B9cncc3',
    callback_url: 'https://moyasar.com/thanks',
    methods: ['creditcard']
  })
</script>
</body>
</html>
