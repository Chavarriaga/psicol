<template>
    <main class="main-page"  id="">
        <template v-if="pageReady">
            <template v-if="showHeader">
                <section class="page-section mb-3" >
                    <div class="container">
                        <div class="grid justify-content-between align-items-center">
                            <div  v-if="!isSubPage"  class="col-fixed " >
                                <Button @click="$router.go(-1)" label=""  class="p-button p-button-text " icon="pi pi-arrow-left"  />
                            </div>
                            <div  class="col " >
                                <div class=" text-2xl text-primary font-bold" >
                                    Editar
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </section>
            </template>
            <section class="page-section " >
                <div class="container">
                    <div class="grid ">
                        <div  class="md:col-9 sm:col-12 comp-grid" >
                            <div >
                                <form ref="observer"  tag="form" @submit.prevent="submitForm()" :class="{ 'card ': !isSubPage }" class=" ">
                                    <!--[form-content-start]-->
                                    <div class="grid">
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Nombre *
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <Textarea :class="getErrorClass('nombre')" class="w-full" ref="ctrlnombre" rows="5"  v-model="formData.nombre" placeholder="Escribir Nombre"    type="textarea">
                                                    </Textarea>
                                                    <small v-if="isFieldValid('nombre')" class="p-error">{{ getFieldError('nombre') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Descripcion 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <Textarea :class="getErrorClass('descripcion')" class="w-full" ref="ctrldescripcion" rows="5"  v-model="formData.descripcion" placeholder="Escribir Descripcion"    type="textarea">
                                                    </Textarea>
                                                    <small v-if="isFieldValid('descripcion')" class="p-error">{{ getFieldError('descripcion') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Creditos 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <InputText  ref="ctrlcreditos" v-model.trim="formData.creditos"  label="Creditos" type="number" placeholder="Escribir Creditos"   step="any"    
                                                    class=" w-full" :class="getErrorClass('creditos')">
                                                    </InputText>
                                                    <small v-if="isFieldValid('creditos')" class="p-error">{{ getFieldError('creditos') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Areaconocimiento 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <Textarea :class="getErrorClass('areaconocimiento')" class="w-full" ref="ctrlareaconocimiento" rows="5"  v-model="formData.areaconocimiento" placeholder="Escribir Areaconocimiento"    type="textarea">
                                                    </Textarea>
                                                    <small v-if="isFieldValid('areaconocimiento')" class="p-error">{{ getFieldError('areaconocimiento') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Electivaobligatoria 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <Textarea :class="getErrorClass('electivaobligatoria')" class="w-full" ref="ctrlelectivaobligatoria" rows="5"  v-model="formData.electivaobligatoria" placeholder="Escribir Electivaobligatoria"    type="textarea">
                                                    </Textarea>
                                                    <small v-if="isFieldValid('electivaobligatoria')" class="p-error">{{ getFieldError('electivaobligatoria') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--[form-content-end]-->
                                    <div v-if="showSubmitButton" class="text-center my-3">
                                        <Button type="submit" label="Actualizar" icon="pi pi-send" :loading="saving" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </template>
        <template v-if="loading">
            <div style="min-height:200px" class="flex gap-3 justify-content-center align-items-center p-3">
                <div><ProgressSpinner style="width:50px;height:50px" /> </div>
                <div class="text-500">Cargando... </div>
            </div>
        </template>
    </main>
</template>
<script setup>
	import {  computed,  reactive, toRefs, onMounted } from 'vue';
	import { required, numeric, } from 'src/services/validators';
	import { useApp } from 'src/composables/app.js';
	import { useEditPage } from 'src/composables/editpage.js';
	import { usePageStore } from 'src/store/page';
	const props = defineProps({
		id: [String, Number],
		pageStoreKey: {
			type: String,
			default: 'ASIGNATURAS',
		},
		pageName: {
			type: String,
			default: 'asignaturas',
		},
		routeName: {
			type: String,
			default: 'asignaturasedit',
		},
		pagePath: {
			type : String,
			default : 'asignaturas/edit',
		},
		apiPath: {
			type: String,
			default: 'asignaturas/edit',
		},
		submitButtonLabel: {
			type: String,
			default: "Actualizar",
		},
		formValidationError: {
			type: String,
			default: "El formulario no es válido",
		},
		formValidationMsg: {
			type: String,
			default: "Por favor complete el formulario",
		},
		msgTitle: {
			type: String,
			default: "Actualizar registro",
		},
		msgBeforeSave: {
			type: String,
			default: "",
		},
		msgAfterSave: {
			type: String,
			default: "Registro actualizado con éxito",
		},
		showHeader: {
			type: Boolean,
			default: true,
		},
		showSubmitButton: {
			type: Boolean,
			default: true,
		},
		redirect: {
			type : Boolean,
			default : true,
		},
		isSubPage: {
			type : Boolean,
			default : false,
		},
	});
	
	const store = usePageStore(props.pageStoreKey);
	const app = useApp();
	
	const formDefaultValues = Object.assign({
		nombre: "", 
		descripcion: "", 
		creditos: "", 
		areaconocimiento: "", 
		electivaobligatoria: "", 
	}, props.pageData);
	
	const formData = reactive({ ...formDefaultValues });
	
	function afterSubmit(response) {
		app.flashMsg(props.msgTitle, props.msgAfterSave);
		if(app.isDialogOpen()){
			app.closeDialogs(); // if page is open as dialog, close dialog
		}
		else if(props.redirect) {
			app.navigateTo(`/asignaturas`);
		}
	}
	
	// form validation rules
	const rules = computed(() => {
		return {
			nombre: { required },
			descripcion: {  },
			creditos: { numeric },
			areaconocimiento: {  },
			electivaobligatoria: {  }
		}
	});
	
	const page = useEditPage({store, props, formData, rules, afterSubmit });
	
	const {  currentRecord: editRecord } = toRefs(store.state);
	const {  pageReady, saving, loading, } = toRefs(page.state);
	
	const { apiUrl } = page.computedProps;
	
	const { load, submitForm, getErrorClass, getFieldError, isFieldValid,  } = page.methods;
	
	onMounted(()=>{
		const pageTitle = "Editar";
		app.setPageTitle(props.routeName, pageTitle); // set browser page title
	});
</script>
<style scoped>
</style>
