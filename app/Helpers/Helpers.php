<?php

use App\Models\Option;
use App\Models\ProductFieldValue;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

/**
 * Get value of requested option.
 * @param  string  $optionKey
 * @param  int|string|bool|array  $default
 * @return mixed
 */
function getOption($optionKey, $default = null)
{
    $option = Option::where('key', $optionKey)->first();
    return ($option && $option->value) ? maybeJsonDecode($option->value) : $default;
}

/**/
function getOptions($keyPrefix)
{
    $optionArr = [];
    $options = Option::where('key', 'LIKE', "%" . $keyPrefix . "%")->get(['key', 'value']);

    foreach ($options as $option) {
        $optionArr[$option->key] = maybeJsonDecode($option->value);
    }
    return $optionArr;
}

/**
 * Create or update option.
 * @param  string  $optionKey
 * @param  int|string|bool|array  $default
 * @return mixed
 */
function updateOption($optionKey, $value)
{
    $checkCurrent = array('key' => $optionKey);
    if ($value && $value !== '' && $value !== 'null') {
        $data = array('value' => maybeJsonEencode($value));
        return Option::updateOrCreate($checkCurrent, $data);
    } else {
        return '';
    }
}

/**
 * Do json encode if needed.
 *
 * @param mixed $value
 * @return mixed $value
 */
function maybeJsonEencode($value)
{
    if (is_array($value) || is_object($value)) {
        return json_encode($value);
    }
    return $value;
}

/**
 * Do json decode if needed.
 *
 * @param mixed $value
 * @return mixed $value
 */
function maybeJsonDecode($value)
{
    $decoded_value = json_decode($value, true);

    if (json_last_error() === JSON_ERROR_NONE) {
        return $decoded_value;
    }

    return $value;
}

/**
 * Check if value is JSON.
 *
 * @param mixed $value
 * @return bool
 */
function isJson($value)
{
    json_decode($value);
    return json_last_error() === JSON_ERROR_NONE;
}

function listThemes()
{
    // Define the directory path
    $directory = resource_path('views/frontend/themes');

    // Get all subdirectories in the views directory
    $folders = File::directories($directory);

    // Extract only the folder names without the full path
    $folderNames = array_map('basename', $folders);

    return $folderNames;
}

function updateProductExtendedFields($fields, $values, $productID)
{
    foreach ($fields as $field) {
        if (array_key_exists($field['name'], $values)) {
            // Check is field value exist in database
            $fieldValue = ProductFieldValue::where('product_field_id', $field['id'])->where('product_id', $productID)->first();
            if ($fieldValue) {
                $value = $values[$field['name']];
                $fieldValue->value = $value;
                $fieldValue->save();
            } else {
                $value = $values[$field['name']];
                $data = [
                    'product_id' => $productID,
                    'product_field_id' => $field['id'],
                    'value' => $value
                ];
                $productValue = ProductFieldValue::create($data);
            }
        }
    }
}

function addValuesToProductFields($fields, $productID)
{
    $values = ProductFieldValue::where('product_id', $productID)->get();

    foreach ($fields as $field) {
        $fieldId = $field->id;
        $foundObject = collect($values)->first(function ($valueObject) use ($fieldId, $productID) {
            return $valueObject['product_field_id'] == $fieldId && $valueObject['product_id'] == $productID;
        });

        if ($foundObject) {
            $field['value'] = $foundObject['value'];
        } else {
            $field['value'] = null;
        }
    }

    return $fields;
}
