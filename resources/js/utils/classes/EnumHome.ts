export default class EnumHome {
    public static columns: Array<object> = [
        {field: 'id', header: 'ID', sortable: true},
        {field: 'car_brand_name', header: "Brand"},
        {field: 'car_model_name', header: 'Model'},
        {field: 'bulk', header: 'Bulk'},
        {field: 'consumption', header: 'Consumption'},
        {field: 'mileage', header: 'Mileage'},
        {field: 'created_at', header: 'Created At'},
    ];
}