<template>
    <div id="master-detailpage">
        <TabView v-model:activeIndex="activeTab">
            <TabPanel>
                <template #header>
                    <div class=" text-lg font-bold" >
                        Profesore Profesorestudianteasignatura
                    </div>
                </template>
                <div class="card my-3 p-3 surface-50">
                    <ProfesorestudianteasignaturaListPage ref="profesorestudianteasignaturaListPage"  field-name="ProfesorEstudianteAsignatura.idprofesor" :field-value="masterRecord.documento" :show-header="false" :show-breadcrumbs="false" isSubPage>
                    </ProfesorestudianteasignaturaListPage>
                </div>
            </TabPanel>
        </TabView>
    </div>
</template>
<script setup>
import { watch, computed, ref, onMounted } from 'vue';
import { useApp } from 'src/composables/app.js';
import { usePageStore } from 'src/store/page';
import ProfesorestudianteasignaturaListPage from "../profesorestudianteasignatura/list.vue";
const props = defineProps({
	isSubPage: {
		type : Boolean,
		default : true,
	},
	scrollIntoView: {
		type : Boolean,
		default : false,
	},
});
const store = usePageStore('PROFESORES');
const app = useApp();
const masterRecord = computed(() => store.state.currentRecord);
const activeTab = ref(0);
const pageReady = computed(() => masterRecord.value != null);
//scroll detail page into view
function scrollToDetailPage() {
	if (props.scrollIntoView) {
		const pageElement = document.getElementById('master-detailpage');
		if(pageElement){
			pageElement.scrollIntoView({behavior:'smooth', block:'start'});
		}
	}
}
// pass form data from master to detail
function setDetailPageFormData(){
	const record = masterRecord.value;
	 
	// set profesorestudianteasignatura form data
	const profesorestudianteasignaturaStore = usePageStore('profesorestudianteasignatura');
	profesorestudianteasignaturaStore.setFormData({ idprofesor:record?.documento });
}
watch(() => masterRecord, () => {
		setDetailPageFormData();
		scrollToDetailPage();
	},
	{ deep: true, immediate: true }
);
onMounted(()=>{ 
    scrollToDetailPage();
});
</script>
