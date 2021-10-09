# php-json-response

#### simple library for create json response for rest api

```php
$res = new Response();
```

### ::getData

return your setup response data.

```php
$data = $res->getData();
```

### ::getStatus

return response status boolean value.

```php
$status = $res->getStatus();
```

### ::getErrors

return your setup error from response instance.

```php
$errors = $res->getErrors();
```

### ::setData

you can set data using this method accept any format data such as `string,object,array,boolean,integer`.

```php
$data = array(
    "first_name" => "syed mohammad hussain",
    "last_name" => "naqvi",
);
$res->setData($data);
```

### ::setErrors

you can set your errors for response using this method accept `Error instance or null` data format.

```php
//pass array of errors codes
$res->setErrors([1100, 1101, 1102, 1105]);

// pass errors code with text message
$res->setErrors([
    array("code" => 1100, "message" => "user not found!")
]);

// or you can use Error instance to manage better and more comfortable your errors
$errors = new Errors();
$errors->addErrorCode(1100);
$errors->addErrorCode(1101);
$errors->addErrorCode(1102);
$errors->addErrorCode(1105);

$res->setErrors($errors->getErrorsCodes());
```

### ::setStatus

set your response status accept boolean value `true or false`

```php
$res->setStatus(false); // default set false 
```

### ::toJson

using `exit()` and `json_encode()` stop php process then show json response.

```php
$res->toJson();
```

### ::toArray

return `array` of response object has `success|errors|data` arrays key

```php
$response = $res->toArray();

$success =  $response["success"];
$data =  $response["data"];
$errors =  $response["errors"];
```

created by @smhnaqvi