<template>
    <section class="px-10 py-10">
        <DataTable :value="store.getters['autoTrips/GET_AUTO_TRIPS']"
                   stripedRows
                   size="normal"
                    pt:root:class=""
                    pt:tablecontainer:class="rounded-md shadow-lg">
            <Column v-for="col of columns" :key="col.field" :field="col.field" :header="col.header"></Column>
        </DataTable>
    </section>
</template>

<script lang="ts" setup>
import {onMounted} from "vue";
import store from "@/store.ts";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import EnumHome from "@/utils/classes/EnumHome.ts";

const columns: Array<object> = EnumHome.columns;

onMounted(() => {
    store.dispatch('autoTrips/indexAutoTrips');
});

</script>

