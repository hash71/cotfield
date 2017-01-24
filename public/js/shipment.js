function getSea() {
    var sea = "";
    sea += "<div class=\"row\">";
    sea += "    <div class=\"col-lg-8 col-lg-offset-2\">";
    sea += "        <div class=\"ibox float-e-margins\">";
    sea += "            <div class=\"ibox-content\">";
    sea += "                <h3>Shipment<\/h3>";
    sea += "                <div class=\"form-group\">";
    sea += "                    <label class=\"font-normal\" for=\"shipment_date\">Shipment Date<\/label>";
    sea += "                    <div class=\"input-group date\">";
    sea += "                        <span class=\"input-group-addon\"><i class=\"fa fa-calendar\"><\/i><\/span>";
    sea += "                        <input type=\"text\" class=\"form-control\" name=\"shipment_date\">";
    sea += "                    <\/div>";
    sea += "                <\/div>";
    sea += "                <div class=\"form-group\">";
    sea += "                    <label for=\"shipment_type\">Shipment Type<\/label>";
    sea += "                    <select name=\"shipment_type\" style=\"width: 100%;height: 30px;\" class=\"shipment_type\">";
    sea += "                        <option value=\"by_sea\" selected>BY SEA<\/option>";
    sea += "                        <option value=\"by_road\">BY ROAD<\/option>";
    sea += "                    <\/select>";
    sea += "                <\/div>";
    sea += "                <div class=\"form-group\">";
    sea += "                    <label for=\"shipment_shipping_line\">Shipping Line<\/label>";
    sea += "                    <input type=\"text\" name=\"shipment_shipping_line\" autocomplete=\"off\" class=\"form-control text-box\" value=\"\">";
    sea += "                <\/div>";
    sea += "                <div class=\"form-group\">";
    sea += "                    <label for=\"shipment_vessel_name\">Vessel Name<\/label>";
    sea += "                    <input type=\"text\" name=\"shipment_vessel_name\" autocomplete=\"off\" class=\"form-control text-box\" value=\"\">";
    sea += "                <\/div>";
    sea += "                <div class=\"form-group\">";
    sea += "                    <label for=\"shipment_bill_of_lading\">Bill Of Loading Number<\/label>";
    sea += "                    <input type=\"text\" name=\"shipment_bill_of_lading\" autocomplete=\"off\" class=\"form-control text-box\" value=\"\">";
    sea += "                <\/div>";
    sea += "                <div class=\"form-group\">";
    sea += "                    <label for=\"shipment_no_of_containers\">No. Of Containers<\/label>";
    sea += "                    <input type=\"text\" name=\"shipment_no_of_containers\" autocomplete=\"off\" class=\"form-control \" value=\"\">";
    sea += "                <\/div>";
    sea += "                <div class=\"form-group\">";
    sea += "                    <label for=\"shipment_no_of_bales\">No. Of Bales<\/label>";
    sea += "                    <input type=\"text\" name=\"shipment_no_of_bales\" autocomplete=\"off\" class=\"form-control \" value=\"\">";
    sea += "                <\/div>";
    sea += "                <div class=\"form-group\">";
    sea += "                    <label for=\"shipment_port_of_loading\">Port Of Loading<\/label>";
    sea += "                    <select name=\"shipment_port_of_loading\" style=\"width: 100%;\" class=\"shipment_port_of_loading\">";
    sea += "                    <\/select>";
    sea += "                <\/div>";
    sea += "                <div class=\"form-group\">";
    sea += "                    <label class=\"font-normal\" for=\"transshipment_date\">Date Of Issue<\/label>";
    sea += "                    <div class=\"input-group date\">";
    sea += "                        <span class=\"input-group-addon\"><i class=\"fa fa-calendar\"><\/i><\/span>";
    sea += "                        <input type=\"text\" class=\"form-control\" name=\"transshipment_date\">";
    sea += "                    <\/div>";
    sea += "                <\/div>";
    sea += "                <div class=\"form-group\">";
    sea += "                    <label for=\"shipment_transshipment_port\">Transshipment Port<\/label>";
    sea += "                    <select name=\"shipment_transshipment_port\" style=\"width: 100%;\" class=\"shipment_transshipment_port\">";
    sea += "                    <\/select>";
    sea += "                <\/div>";
    sea += "                <div class=\"form-group\">";
    sea += "                    <label for=\"shipment_port_of_discharge\">Port Of Discharge<\/label>";
    sea += "                    <select name=\"shipment_port_of_discharge\" style=\"width: 100%;\" class=\"shipment_port_of_discharge\">";
    sea += "                    <\/select>";
    sea += "                <\/div>";
    sea += "                <div class=\"form-group\">";
    sea += "                    <label class=\"font-normal\" for=\"eta_date\">ETA Date<\/label>";
    sea += "                    <div class=\"input-group date\">";
    sea += "                        <span class=\"input-group-addon\"><i class=\"fa fa-calendar\"><\/i><\/span>";
    sea += "                        <input type=\"text\" class=\"form-control\" name=\"eta_date\">";
    sea += "                    <\/div>";
    sea += "                <\/div>";
    sea += "                <div class=\"form-group\">";
    sea += "                    <label for=\"shipment_advice\">Shipment Advice<\/label>";
    sea += "                    <div id=\"shipment_advice\">";
    sea += "                    <\/div>";
    sea += "                    <div id=\"shipment_advice_div\">";
    sea += "                    <\/div>";
    sea += "                <\/div>";
    sea += "            <\/div>";
    sea += "        <\/div>";
    sea += "    <\/div>";
    sea += "<\/div>";
    sea += "";
    return sea;
}
function getRoad() {
    var road = "";
    road += "<div class=\"row\">";
    road += "    <div class=\"col-lg-8 col-lg-offset-2\">";
    road += "        <div class=\"ibox float-e-margins\">";
    road += "            <div class=\"ibox-content\">";
    road += "                <h3>Shipment<\/h3>";
    road += "                <div class=\"form-group\">";
    road += "                    <label class=\"font-normal\" for=\"shipment_date\">Shipment Date<\/label>";
    road += "                    <div class=\"input-group date\">";
    road += "                        <span class=\"input-group-addon\"><i class=\"fa fa-calendar\"><\/i><\/span>";
    road += "                        <input type=\"text\" class=\"form-control\" name=\"shipment_date\">";
    road += "                    <\/div>";
    road += "                <\/div>";
    road += "                <div class=\"form-group\">";
    road += "                    <label for=\"shipment_type\">Shipment Type<\/label>";
    road += "                    <select name=\"shipment_type\" style=\"width: 100%;height: 30px;\" class=\"shipment_type\">";
    road += "                        <option value=\"by_road\" selected>BY ROAD<\/option>";
    road += "                        <option value=\"by_sea\">BY SEA<\/option>";
    road += "                    <\/select>";
    road += "                <\/div>";
    road += "                <div class=\"form-group\">";
    road += "                    <label for=\"shipment_truck_challan_no\">Truck Chalan No.<\/label>";
    road += "                    <input type=\"text\" name=\"shipment_truck_challan_no\" autocomplete=\"off\" class=\"form-control text-box\" value=\"\">";
    road += "                <\/div>";
    road += "                <div class=\"form-group\">";
    road += "                    <label for=\"shipment_no_of_trucks\">No. Of Trucks<\/label>";
    road += "                    <input type=\"text\" name=\"shipment_no_of_trucks\" autocomplete=\"off\" class=\"form-control text-box\" value=\"\">";
    road += "                <\/div>";
    road += "                <div class=\"form-group\">";
    road += "                    <label for=\"shipment_no_of_bales\">No. Of Bales<\/label>";
    road += "                    <input type=\"text\" name=\"shipment_no_of_bales\" autocomplete=\"off\" class=\"form-control text-box\" value=\"\">";
    road += "                <\/div>";
    road += "                <div class=\"form-group\">";
    road += "                    <label for=\"shipment_port_of_loading\">Port Of Loading<\/label>";
    road += "                    <select name=\"shipment_port_of_loading\" style=\"width: 100%;\" class=\"shipment_port_of_loading\">";
    road += "                    <\/select>";
    road += "                <\/div>";
    road += "                <div class=\"form-group\">";
    road += "                    <label for=\"shipment_port_of_discharge\">Port Of Discharge<\/label>";
    road += "                    <select name=\"shipment_port_of_discharge\" style=\"width: 100%;\" class=\"shipment_port_of_discharge\">";
    road += "                    <\/select>";
    road += "                <\/div>";
    road += "                <div class=\"form-group\">";
    road += "                    <label for=\"shipment_advice\">Shipment Advice<\/label>";
    road += "                    <div id=\"shipment_advice\">";
    road += "                    <\/div>";
    road += "                    <div id=\"shipment_advice_div\">";
    road += "                    <\/div>";
    road += "                <\/div>";
    road += "            <\/div>";
    road += "        <\/div>";
    road += "    <\/div>";
    road += "<\/div>";
    road += "";
    return road;
}
function getNN() {
    var nn = "";
    nn += "<div class=\"row\">";
    nn += "    <div class=\"col-lg-8 col-lg-offset-2\">";
    nn += "        <div class=\"ibox float-e-margins\">";
    nn += "            <div class=\"ibox-content\">";
    nn += "                <h3>NN Documents<\/h3>";
    nn += "                <div class=\"form-group\">";
    nn += "                    <label for=\"nn_commercial_invoice_no\">Commercial Invoice Number<\/label>";
    nn += "                    <input type=\"text\" name=\"nn_commercial_invoice_no\" autocomplete=\"off\" class=\"form-control text-box\" value=\"\">";
    nn += "                <\/div>";
    nn += "                <div class=\"form-group\">";
    nn += "                    <label class=\"font-normal\" for=\"nn_commercial_invoice_date\">Commercial Invoice Date";
    nn += "                    <\/label>";
    nn += "                    <div class=\"input-group date\">";
    nn += "                        <span class=\"input-group-addon\"><i class=\"fa fa-calendar\"><\/i><\/span>";
    nn += "                        <input type=\"text\" class=\"form-control\" name=\"nn_commercial_invoice_date\">";
    nn += "                    <\/div>";
    nn += "                <\/div>";
    nn += "                <div class=\"form-group\">";
    nn += "                    <label class=\"font-normal\" for=\"courier_date\">Courier Date<\/label>";
    nn += "                    <div class=\"input-group date\">";
    nn += "                        <span class=\"input-group-addon\"><i class=\"fa fa-calendar\"><\/i><\/span>";
    nn += "                        <input type=\"text\" class=\"form-control\" name=\"courier_date\">";
    nn += "                    <\/div>";
    nn += "                <\/div>";
    nn += "                <div class=\"form-group\">";
    nn += "                    <label for=\"nn_dhl_courier_name\">Courier Name<\/label>";
    nn += "                    <input type=\"text\" name=\"nn_dhl_courier_name\" autocomplete=\"off\" class=\"form-control text-box\" value=\"\">";
    nn += "                <\/div>";
    nn += "                <div class=\"form-group\">";
    nn += "                    <label for=\"nn_dhl_courier_details\">File Number<\/label>";
    nn += "                    <input type=\"text\" name=\"nn_dhl_courier_details\" autocomplete=\"off\" class=\"form-control text-box\" value=\"\">";
    nn += "                <\/div>";
    nn += "                <div class=\"form-group\">";
    nn += "                    <label for=\"upload_nn_documents\">Upload NN Documents<\/label>";
    nn += "                    <div id=\"upload_nn_documents\">";
    nn += "                    <\/div>";
    nn += "                    <div id=\"upload_nn_documents_div\">";
    nn += "                    <\/div>";
    nn += "                <\/div>";
    nn += "            <\/div>";
    nn += "        <\/div>";
    nn += "    <\/div>";
    nn += "<\/div>";
    nn += "";
    return nn;
}
function getSeaPartial(id) {
    var sea = "";
    sea += "<div class=\"row\" id=\"" + id + "\">";
    sea += "    <div class=\"col-lg-8 col-lg-offset-2\">";
    sea += "        <div class=\"ibox float-e-margins\">";
    sea += "            <div class=\"ibox-content\">";
    sea += "                <h3>Shipment " + id + "<\/h3>";
    sea += "                <div class=\"form-group\">";
    sea += "                    <label class=\"font-normal\" for=\"shipment_date\">Shipment Date<\/label>";
    sea += "                    <div class=\"input-group date\">";
    sea += "                        <span class=\"input-group-addon\"><i class=\"fa fa-calendar\"><\/i><\/span>";
    sea += "                        <input type=\"text\" class=\"form-control\" name=\"shipment_date[]\" value=\"\">";
    sea += "                    <\/div>";
    sea += "                <\/div>";
    sea += "                <div class=\"form-group\">";
    sea += "                    <label for=\"shipment_type\">Shipment Type<\/label>";
    sea += "                    <select name=\"shipment_type[]\" style=\"width: 100%;height: 30px;\" class=\"shipment_type\">";
    sea += "                        <option value=\"by_sea\" selected>BY SEA<\/option>";
    sea += "                        <option value=\"by_road\">BY ROAD<\/option>";
    sea += "                    <\/select>";
    sea += "                <\/div>";
    sea += "                <div class=\"form-group\">";
    sea += "                    <label for=\"shipment_shipping_line\">Shipping Line<\/label>";
    sea += "                    <input type=\"text\" name=\"shipment_shipping_line[]\" autocomplete=\"off\" class=\"form-control text-box\" value=\"\">";
    sea += "                <\/div>";
    sea += "                <div class=\"form-group\">";
    sea += "                    <label for=\"shipment_vessel_name\">Vessel Name<\/label>";
    sea += "                    <input type=\"text\" name=\"shipment_vessel_name[]\" autocomplete=\"off\" class=\"form-control text-box\" value=\"\">";
    sea += "                <\/div>";
    sea += "                <div class=\"form-group\">";
    sea += "                    <label for=\"shipment_bill_of_lading\">Bill Of Loading Number<\/label>";
    sea += "                    <input type=\"text\" name=\"shipment_bill_of_lading[]\" autocomplete=\"off\" class=\"form-control text-box\" value=\"\">";
    sea += "                <\/div>";
    sea += "                <div class=\"form-group\">";
    sea += "                    <label for=\"shipment_no_of_containers\">No. Of Containers<\/label>";
    sea += "                    <input type=\"text\" name=\"shipment_no_of_containers[]\" autocomplete=\"off\" class=\"form-control \" value=\"\">";
    sea += "                <\/div>";
    sea += "                <div class=\"form-group\">";
    sea += "                    <label for=\"shipment_no_of_bales\">No. Of Bales<\/label>";
    sea += "                    <input type=\"text\" name=\"shipment_no_of_bales[]\" autocomplete=\"off\" class=\"form-control \" value=\"\">";
    sea += "                <\/div>";
    sea += "                <div class=\"form-group\">";
    sea += "                    <label for=\"shipment_port_of_loading\">Port Of Loading<\/label>";
    sea += "                    <select id=\"shipment_port_of_loading" + id + "\" name=\"shipment_port_of_loading[]" + "\" style=\"width: 100%;\" class=\"shipment_port_of_loading\">";
    sea += "                    <\/select>";
    sea += "                <\/div>";
    sea += "                <div class=\"form-group\">";
    sea += "                    <label class=\"font-normal\" for=\"transshipment_date\">Date Of Issue<\/label>";
    sea += "                    <div class=\"input-group date\">";
    sea += "                        <span class=\"input-group-addon\"><i class=\"fa fa-calendar\"><\/i><\/span>";
    sea += "                        <input type=\"text\" class=\"form-control\" name=\"transshipment_date[]\" value=\"\">";
    sea += "                    <\/div>";
    sea += "                <\/div>";
    sea += "                <div class=\"form-group\">";
    sea += "                    <label for=\"shipment_transshipment_port\">Transshipment Port<\/label>";
    sea += "                    <select id=\"shipment_transshipment_port" + id + "\" name=\"shipment_transshipment_port[]" + "\" style=\"width: 100%;\" class=\"shipment_transshipment_port\">";
    sea += "                    <\/select>";
    sea += "                <\/div>";
    sea += "                <div class=\"form-group\">";
    sea += "                    <label for=\"shipment_port_of_discharge\">Port Of Discharge<\/label>";
    sea += "                    <select id=\"shipment_port_of_discharge" + id + "\" name=\"shipment_port_of_discharge[]" + "\" style=\"width: 100%;\" class=\"shipment_port_of_discharge\">";
    sea += "                    <\/select>";
    sea += "                <\/div>";
    sea += "                <div class=\"form-group\">";
    sea += "                    <label class=\"font-normal\" for=\"eta_date\">ETA Date<\/label>";
    sea += "                    <div class=\"input-group date\">";
    sea += "                        <span class=\"input-group-addon\"><i class=\"fa fa-calendar\"><\/i><\/span>";
    sea += "                        <input type=\"text\" class=\"form-control\" name=\"eta_date[]\" value=\"\">";
    sea += "                    <\/div>";
    sea += "                <\/div>";
    sea += getShipmentFile(id);
    sea += "            <\/div>";
    sea += "        <\/div>";
    sea += "    <\/div>";
    sea += "<\/div>";
    return sea;
}
function getRoadPartial(id) {
    var road = "";
    road += "<div class=\"row\" id=\"" + id + "\">";
    road += "    <div class=\"col-lg-8 col-lg-offset-2\">";
    road += "        <div class=\"ibox float-e-margins\">";
    road += "            <div class=\"ibox-content\">";
    road += "                <h3>Shipment " + id + "<\/h3>";
    road += "                <div class=\"form-group\">";
    road += "                    <label class=\"font-normal\" for=\"shipment_date\">Shipment Date<\/label>";
    road += "                    <div class=\"input-group date\">";
    road += "                        <span class=\"input-group-addon\"><i class=\"fa fa-calendar\"><\/i><\/span>";
    road += "                        <input type=\"text\" class=\"form-control\" name=\"shipment_date[]\" value=\"\">";
    road += "                    <\/div>";
    road += "                <\/div>";
    road += "                <div class=\"form-group\">";
    road += "                    <label for=\"shipment_type\">Shipment Type<\/label>";
    road += "                    <select name=\"shipment_type[]\" style=\"width: 100%;height: 30px;\" class=\"shipment_type\">";
    road += "                        <option value=\"by_road\" selected>BY ROAD<\/option>";
    road += "                        <option value=\"by_sea\">BY SEA<\/option>";
    road += "                    <\/select>";
    road += "                <\/div>";
    road += "                <div class=\"form-group\">";
    road += "                    <label for=\"shipment_truck_challan_no\">Truck Chalan No.<\/label>";
    road += "                    <input type=\"text\" name=\"shipment_truck_challan_no[]\" autocomplete=\"off\" class=\"form-control text-box\" value=\"\">";
    road += "                <\/div>";
    road += "                <div class=\"form-group\">";
    road += "                    <label for=\"shipment_no_of_trucks\">No. Of Trucks<\/label>";
    road += "                    <input type=\"text\" name=\"shipment_no_of_trucks[]\" autocomplete=\"off\" class=\"form-control text-box\" value=\"\">";
    road += "                <\/div>";
    road += "                <div class=\"form-group\">";
    road += "                    <label for=\"shipment_no_of_bales\">No. Of Bales<\/label>";
    road += "                    <input type=\"text\" name=\"shipment_no_of_bales[]\" autocomplete=\"off\" class=\"form-control text-box\" value=\"\">";
    road += "                <\/div>";
    road += "                <div class=\"form-group\">";
    road += "                    <label for=\"shipment_port_of_loading\">Port Of Loading<\/label>";
    road += "                    <select id=\"shipment_port_of_loading" + id + "\" name=\"shipment_port_of_loading[]" + "\" style=\"width: 100%;\" class=\"shipment_port_of_loading\">";
    road += "                    <\/select>";
    road += "                <\/div>";
    road += "                <div class=\"form-group\">";
    road += "                    <label for=\"shipment_port_of_discharge\">Port Of Discharge<\/label>";
    road += "                    <select id=\"shipment_port_of_discharge" + id + "\" name=\"shipment_port_of_discharge[]" + "\" style=\"width: 100%;\" class=\"shipment_port_of_discharge\">";
    road += "                    <\/select>";
    road += "                <\/div>";
    road += getShipmentFile(id);
    road += "            <\/div>";
    road += "        <\/div>";
    road += "    <\/div>";
    road += "<\/div>";
    return road;
}
function getNNPartial(id) {
    var nn = "";
    nn += "<div class=\"row\">";
    nn += "    <div class=\"col-lg-8 col-lg-offset-2\">";
    nn += "        <div class=\"ibox float-e-margins\">";
    nn += "            <div class=\"ibox-content\">";
    nn += "                <h3>NN Documents " + id + "<\/h3>";
    nn += "                <div class=\"form-group\">";
    nn += "                    <label for=\"nn_commercial_invoice_no\">Commercial Invoice Number<\/label>";
    nn += "                    <input type=\"text\" name=\"nn_commercial_invoice_no[]\" autocomplete=\"off\" class=\"form-control text-box\" value=\"\">";
    nn += "                <\/div>";
    nn += "                <div class=\"form-group\">";
    nn += "                    <label class=\"font-normal\" for=\"nn_commercial_invoice_date\">Commercial Invoice Date";
    nn += "                    <\/label>";
    nn += "                    <div class=\"input-group date\">";
    nn += "                        <span class=\"input-group-addon\"><i class=\"fa fa-calendar\"><\/i><\/span>";
    nn += "                        <input type=\"text\" class=\"form-control\" name=\"nn_commercial_invoice_date[]\" value=\"\">";
    nn += "                    <\/div>";
    nn += "                <\/div>";
    nn += "                <div class=\"form-group\">";
    nn += "                    <label class=\"font-normal\" for=\"courier_date\">Courier Date<\/label>";
    nn += "                    <div class=\"input-group date\">";
    nn += "                        <span class=\"input-group-addon\"><i class=\"fa fa-calendar\"><\/i><\/span>";
    nn += "                        <input type=\"text\" class=\"form-control\" name=\"courier_date[]\" value=\"\">";
    nn += "                    <\/div>";
    nn += "                <\/div>";
    nn += "                <div class=\"form-group\">";
    nn += "                    <label for=\"nn_dhl_courier_name\">Courier Name<\/label>";
    nn += "                    <input type=\"text\" name=\"nn_dhl_courier_name[]\" autocomplete=\"off\" class=\"form-control text-box\" value=\"\">";
    nn += "                <\/div>";
    nn += "                <div class=\"form-group\">";
    nn += "                    <label for=\"nn_dhl_courier_details\">File Number<\/label>";
    nn += "                    <input type=\"text\" name=\"nn_dhl_courier_details[]\" autocomplete=\"off\" class=\"form-control text-box\" value=\"\">";
    nn += "                <\/div>";
    nn += getNNFile(id);
    nn += "            <\/div>";
    nn += "        <\/div>";
    nn += "    <\/div>";
    nn += "<\/div>";
    return nn;
}
function getShipmentFile(id) {
    var file = '<div class="form-group"><label for="shipment_advice_' + id + '">Shipment Advice</label><div id="shipment_advice_' + id + '"></div><div id="shipment_advice_' + id + '_div"></div></div>';
    return file;
}
function getNNFile(id) {
    var file = '<div class="form-group"><label for="upload_nn_documents_' + id + '">Upload NN Documents</label><div id="upload_nn_documents_' + id + '"></div><div id="upload_nn_documents_' + id + '_div"></div></div>';
    return file;
}
function getShipmentButtons() {
    var butns = '<div class="row" id="shipment_button"><div class="col-lg-8 col-lg-offset-2"><div style="margin-bottom: 10px"><button onclick="add_more_shipment_button()" type="button" class="btn btn-success btn-outline btn-block" href="#" style="width: 50%;margin: auto;">Add More Shipment</button></div><div style="margin: 10px 0;"><button onclick="delete_shipment_button()" type="button" class="btn btn-danger btn-outline btn-block" href="#" style="width: 50%;margin: auto;">Delete Last Shipment</button></div></div></div>';
    return butns;
}

function add_more_shipment_button() {
    var id_now = adjustShippingNumber(1);

    $('#shipment_button').before(getSeaPartial(id_now));
    $('#shipment_button').before(getNNPartial(id_now));

    initial_plugins_for_shipment_classes(id_now, true);//for attaching select2 plugin
    //on selecting road or sea
    $('.shipment_type').on('change', toggle_sea_road);
}
function delete_shipment_button() {

    if (parseInt($('#shipping_number').val()) > 1) {

        var id_now = parseInt($('#shipping_number').val());
        adjustShippingNumber(-1);
        $('#' + id_now + ' + ' + '.row').remove();
        $('#' + id_now).remove();

        $('html,body').animate({
            scrollTop: $("#shipment_button").offset().top
        });
    }
}

function adjustShippingNumber(number) {
    var y = parseInt($('#shipping_number').val()) + number;
    $('#shipping_number').attr('value', y);
    return y;
}


$('#lc_partial_shipments').on('select2:select', function (evt) {

    var allowed = $('#lc_partial_shipments :selected').text();
    allowed = allowed.trim();

    if (allowed == 'ALLOWED') {
        var id_now = adjustShippingNumber(1);
        $('#group').empty();
        $('#group').append(getSeaPartial(id_now));
        $('#group').append(getNNPartial(id_now));
        $('#group').append(getShipmentButtons());
        initial_plugins_for_shipment_classes(id_now, true);//for attaching select2 plugin
    } else if (allowed == 'NOT ALLOWED') {
        $('#shipping_number').attr('value', 0);//reset shipping number for partial shipment
        $('#group').empty();
        $('#group').append(getSea());
        $('#group').append(getNN());
        initial_plugins_for_shipment_classes();//for attaching select2 plugin
    }
    //on selecting road or sea
    $('.shipment_type').on('change', toggle_sea_road);
});

function toggle_sea_road(evt) {

    var allowed = $('#lc_partial_shipments :selected').text().trim();

    var shipmentType = $(evt.target).val();

    var elemToReplace;

    var replace_element_id;

    if (shipmentType == 'by_road') {
        if (allowed == 'ALLOWED') {
            elemToReplace = $(evt.target).closest('.row');
            replace_element_id = parseInt(elemToReplace.attr('id'));
            elemToReplace.replaceWith(getRoadPartial(replace_element_id));
        } else if (allowed == 'NOT ALLOWED') {
            elemToReplace = $(evt.target).closest('.row');
            elemToReplace.replaceWith(getRoad());
        }

    } else if (shipmentType == 'by_sea') {
        if (allowed == 'ALLOWED') {
            elemToReplace = $(evt.target).closest('.row');
            replace_element_id = parseInt(elemToReplace.attr('id'));
            elemToReplace.replaceWith(getSeaPartial(replace_element_id));
        } else if (allowed == 'NOT ALLOWED') {
            elemToReplace = $(evt.target).closest('.row');
            elemToReplace.replaceWith(getSea());
        }
    }
    if (allowed == 'ALLOWED') {
        initial_plugins_for_shipment_classes(replace_element_id);//attach the select plugin again
    } else if (allowed == 'NOT ALLOWED') {
        initial_plugins_for_shipment_classes();//attach the select plugin again
    }
    $('.shipment_type').on('change', toggle_sea_road);//after toggling attach the event again
}

$(function () {
    function changeValue() {
        var diff = $('#controller_invoice_weight').val() - $('#controller_landing_weight').val();
        $('#s_g_w_c_short_gain_weight_claim_qty').attr('value', diff);
        $('#s_g_w_c_short_gain_weight_claim_amount').attr('value', $('#s_c_price').val() * diff);
    }

    $('#s_c_price').on('change', changeValue);
    $('#controller_invoice_weight').on('change', changeValue);
    $('#controller_landing_weight').on('change', changeValue);

    $('#lc_amendment_day_id').on('click', function (event) {
        event.preventDefault();
        var elem = '<div class="input-group date" id="lc_amendment_day_element" style="padding-top: 10px;"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="lc_amendment_day[]" id="lc_amendment_day"></div>';
        $('#lc_amendment_day_div').append(elem);
        $('.input-group.date').datepicker({
            format: 'yyyy-mm-dd',
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });
    })
});





