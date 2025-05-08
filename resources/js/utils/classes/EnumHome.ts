import EnumColumns from "@/langs/en/Columns.ts";

export default class EnumHome {
    public static columns: Array<object> = [
        {field: 'id', header: 'ID', sortable: true},
        {field: 'car_brand_name', header: EnumColumns.BRAND},
        {field: 'car_model_name', header: EnumColumns.MODEL},
        {field: 'bulk', header: EnumColumns.BULK},
        {field: 'consumption', header: EnumColumns.CONSUMPTION},
        {field: 'mileage', header: EnumColumns.MILEAGE},
        {field: 'created_at', header: EnumColumns.CREATED_AT},
    ];
}