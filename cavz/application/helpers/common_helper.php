<?php
if (!function_exists('truncate_with_tooltip')) {
    function truncate_with_tooltip($string, $length = 20)
    {
        $truncated = (strlen($string) > $length) ? substr($string, 0, $length) . "..." : $string;
        $tooltip = htmlspecialchars($string);
        $output = '<span class="custom-tooltip" data-toggle="tooltip" data-custom-class="tooltip-inverse" data-placement="top" title="' . $tooltip . '">' . $truncated . '</span>';
        return $output;
    }
}

    function formatNullableDate($date)
    {
        if ($date && $date !== '0000-00-00') {
            return date("d/m/Y", strtotime($date));
        }
        return '';
    }

    function addVehicleStock($data)
    {
        if (!empty($data['old_vdetails'])) {
            $old_vdata = $data['old_vdetails'];
            $vehicle_id = $old_vdata['vehicle_id'];
            $order_id = $old_vdata['ord_id'];
            $stock_transfer_type = $old_vdata['stock_transfer_type'];
            $from_stock = $old_vdata['from_stock'];
            $to_stock = $old_vdata['to_stock'];
            $from_stock_id = $old_vdata['from_stock_id'];
            $to_stock_id = $old_vdata['to_stock_id'];
            $delivery_driver = $old_vdata['delivery_driver'];
            $delivery_date = $old_vdata['delivery_date'];
            $delivery_time = $old_vdata['delivery_time'];
            $odometer = $old_vdata['odometer'];
            $fuel_reading = $old_vdata['fuel_reading'];
            $reason = $old_vdata['reason'];
            $vehicle_check_card = $old_vdata['vehicle_check_card'];

            $old_data = array(
                'vehicle_id' => $vehicle_id,
                'order_id' => $order_id,
                'stock_transfer_type' => $stock_transfer_type,
                'to_stock_type' => $to_stock,
                'from_stock_type' => $from_stock,
                'to_stock_id' => $to_stock_id,
                'from_stock_id' => $from_stock_id,
                'delivery_driver' => $delivery_driver,
                'delivery_date' => $delivery_date,
                'delivery_time' => $delivery_time,
                'odometer' => $odometer,
                'fuel_reading' => $fuel_reading,
                'reason' => $reason,
                'vehicle_check_card' => $vehicle_check_card
            );

            $CI = &get_instance();
            $CI->load->model('VehicleStock');
            $result = $CI->VehicleStock->addVehicleStock($old_data);
        }
        if (!empty($data['new_vdetails'])) {

            $new_vdata = $data['new_vdetails'];
            $vehicle_id = $new_vdata['vehicle_id'];
            $order_id = $new_vdata['ord_id'];
            $stock_transfer_type = $new_vdata['stock_transfer_type'];
            $from_stock = $new_vdata['from_stock'];
            $to_stock = $new_vdata['to_stock'];
            $from_stock_id = $new_vdata['from_stock_id'];
            $to_stock_id = $new_vdata['to_stock_id'];
            $delivery_driver = $new_vdata['delivery_driver'];
            $delivery_date = $new_vdata['delivery_date'];
            $delivery_time = $new_vdata['delivery_time'];
            $odometer = $new_vdata['odometer'];
            $fuel_reading = $new_vdata['fuel_reading'];
            $reason = $new_vdata['reason'];
            $vehicle_check_card = $new_vdata['vehicle_check_card'];

            $new_data = array(
                'vehicle_id' => $vehicle_id,
                'order_id' => $order_id,
                'stock_transfer_type' => $stock_transfer_type,
                'to_stock_type' => $to_stock,
                'from_stock_type' => $from_stock,
                'to_stock_id' => $to_stock_id,
                'from_stock_id' => $from_stock_id,
                'delivery_driver' => $delivery_driver,
                'delivery_date' => $delivery_date,
                'delivery_time' => $delivery_time,
                'odometer' => $odometer,
                'fuel_reading' => $fuel_reading,
                'reason' => $reason,
                'vehicle_check_card' => $vehicle_check_card
            );

            $CI = &get_instance();
            $CI->load->model('VehicleStock');
            $result = $CI->VehicleStock->addVehicleStock($new_data);
        }



        if ($result) {

            $response = array(
                'status' => 'success',
                'message' => 'Stock added successfully'
            );
        } else {

            $response = array(
                'status' => 'error',
                'message' => 'Failed to add stock'
            );
        }


        echo json_encode($response);
    }
    function updateVehicleStock($data, $id)
    {
        if (!empty($data)) {
            $vehicle_id = $data['vehicle_id'];
            $stock_transfer_type = $data['stock_transfer_type'];
            $from_stock = $data['from_stock'];
            $to_stock = $data['to_stock'];
            $from_stock_id = $data['from_stock_id'];
            $to_stock_id = $data['to_stock_id'];
            $delivery_driver = $data['delivery_driver'];
            $delivery_date = $data['delivery_date'];
            $delivery_time = $data['delivery_time'];
            $odometer = $data['odometer'];
            $fuel_reading = $data['fuel_reading'];
            $reason = $data['reason'];

            $data = array(
                'vehicle_id' => $vehicle_id,
                'stock_transfer_type' => $stock_transfer_type,
                'to_stock_type' => $to_stock,
                'from_stock_type' => $from_stock,
                'to_stock_id' => $to_stock_id,
                'from_stock_id' => $from_stock_id,
                'delivery_driver' => $delivery_driver,
                'delivery_date' => $delivery_date,
                'delivery_time' => $delivery_time,
                'odometer' => $odometer,
                'fuel_reading' => $fuel_reading,
                'reason' => $reason
            );

            $CI = &get_instance();
            $CI->load->model('VehicleStock');
            $result = $CI->VehicleStock->updateVehicleStock($data, $id);
        }



        if ($result) {

            $response = array(
                'status' => 'success',
                'message' => 'Stock updated successfully'
            );
        } else {

            $response = array(
                'status' => 'error',
                'message' => 'Failed to update stock'
            );
        }


        echo json_encode($response);
    }
    
    if (!function_exists('show_image')) {
        function show_image($path, $imageName, $imageClass = '')
        {
            $imagePath = $path . $imageName;
            $fallbackImagePath = 'assets/media/logos/nophoto.png';
            
            if (file_exists($imagePath)) {
                $imageUrl = base_url($imagePath);
            } else {
                $imageUrl = base_url($fallbackImagePath);
            }
            
            $imageClassAttribute = !empty($imageClass) ? "class=\"$imageClass\"" : '';
            
            return "<img src=\"$imageUrl\" $imageClassAttribute>";
        }
    }
