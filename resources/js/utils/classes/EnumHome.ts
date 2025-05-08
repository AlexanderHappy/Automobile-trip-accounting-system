import EnumColumns from "@/langs/en/Columns.ts";

export default class EnumHome {
    public static columns: Array<object> = [
        {field: 'id', header: 'ID', sortable: true},
        {field: 'carBrandName', header: EnumColumns.BRAND},
        {field: 'carModelName', header: EnumColumns.MODEL},
        {field: 'bulk', header: EnumColumns.BULK},
        {field: 'consumption', header: EnumColumns.CONSUMPTION},
        {field: 'mileage', header: EnumColumns.MILEAGE},
        {field: 'createdAt', header: EnumColumns.CREATED_AT},
    ];
}