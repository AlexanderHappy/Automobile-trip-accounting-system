<template>
    <HeaderBlocks/>

    <section class="px-10 py-10">
        <DataTable :value="store.getters['autoTrips/GET_AUTO_TRIPS']"
                   removableSort
                   stripedRows
                   showGridlines
                   paginator :rows="5" :rowsPerPageOptions="[5, 10, 20, 50]"
                   size="small"
                   pt:tablecontainer:class="rounded-md shadow-lg">

            <Column v-for="col of columns"
                    :key="col.field"
                    :field="col.field"
                    :header="col.header"
                    sortable=""
            />
        </DataTable>
    </section>
</template>

<script lang="ts" setup>
import {onMounted} from "vue";
import store from "@/store.ts";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import EnumHome from "@/utils/classes/EnumHome.ts";
import HeaderBlocks from "@/components/blocks/HeaderBlocks.vue";

const columns: Array<object> = EnumHome.columns;

onMounted(() => {
    store.dispatch('autoTrips/indexAutoTrips');
});

</script>

