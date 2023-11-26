
import { createRouter, createWebHashHistory } from 'vue-router';


function passRouteToProps(route){
	return {
		queryParams: route.query,
		fieldName: route.params.fieldName, 
		fieldValue: route.params.fieldValue
	}
}


let routes = [
	
		{
			path: '/', 
			alias: '/home',
			name: 'home' , 
			component: () => import('./pages/home/home.vue'),
			props: true
		},
		//Dashboard routes


//asignaturas routes
			{
				path: '/asignaturas/:fieldName?/:fieldValue?',
				name: 'asignaturaslist',
				component: () => import('./pages/asignaturas/list.vue'), 
				props: route => passRouteToProps(route)
			},
	
			{ 
				path: '/asignaturas/view/:id', 
				name: 'asignaturasview', 
				component: () => import('./pages/asignaturas/view.vue'), 
				props: true
			},
		
			{ 
				path: '/asignaturas/add', 
				name: 'asignaturasadd', 
				component: () => import('./pages/asignaturas/add.vue'), 
				props: true
			},
	
			{ 
				path: '/asignaturas/edit/:id', 
				name: 'asignaturasedit', 
				component: () => import('./pages/asignaturas/edit.vue'), 
				props: true
			},
		

//estudiantes routes
			{
				path: '/estudiantes/:fieldName?/:fieldValue?',
				name: 'estudianteslist',
				component: () => import('./pages/estudiantes/list.vue'), 
				props: route => passRouteToProps(route)
			},
	
			{ 
				path: '/estudiantes/view/:id', 
				name: 'estudiantesview', 
				component: () => import('./pages/estudiantes/view.vue'), 
				props: true
			},
		
			{ 
				path: '/estudiantes/add', 
				name: 'estudiantesadd', 
				component: () => import('./pages/estudiantes/add.vue'), 
				props: true
			},
	
			{ 
				path: '/estudiantes/edit/:id', 
				name: 'estudiantesedit', 
				component: () => import('./pages/estudiantes/edit.vue'), 
				props: true
			},
		

//profesores routes
			{
				path: '/profesores/:fieldName?/:fieldValue?',
				name: 'profesoreslist',
				component: () => import('./pages/profesores/list.vue'), 
				props: route => passRouteToProps(route)
			},
	
			{ 
				path: '/profesores/view/:id', 
				name: 'profesoresview', 
				component: () => import('./pages/profesores/view.vue'), 
				props: true
			},
		
			{ 
				path: '/profesores/add', 
				name: 'profesoresadd', 
				component: () => import('./pages/profesores/add.vue'), 
				props: true
			},
	
			{ 
				path: '/profesores/edit/:id', 
				name: 'profesoresedit', 
				component: () => import('./pages/profesores/edit.vue'), 
				props: true
			},
		

//profesorestudianteasignatura routes
			{
				path: '/profesorestudianteasignatura/:fieldName?/:fieldValue?',
				name: 'profesorestudianteasignaturalist',
				component: () => import('./pages/profesorestudianteasignatura/list.vue'), 
				props: route => passRouteToProps(route)
			},
	
			{ 
				path: '/profesorestudianteasignatura/view/:id', 
				name: 'profesorestudianteasignaturaview', 
				component: () => import('./pages/profesorestudianteasignatura/view.vue'), 
				props: true
			},
		
			{ 
				path: '/profesorestudianteasignatura/add', 
				name: 'profesorestudianteasignaturaadd', 
				component: () => import('./pages/profesorestudianteasignatura/add.vue'), 
				props: true
			},
	
			{ 
				path: '/profesorestudianteasignatura/edit/:id', 
				name: 'profesorestudianteasignaturaedit', 
				component: () => import('./pages/profesorestudianteasignatura/edit.vue'), 
				props: true
			},
		

	
	
	
	
	{ 
		path:  '/error/forbidden', 
		name: 'forbidden', 
		component: () => import('./pages/errors/forbidden.vue'),
		props: true
	},
	{ 
		path: '/error/notfound', 
		name: 'notfound',
		component: () => import('./pages/errors/pagenotfound.vue'),
		props: true
	},
	{
		path: '/:catchAll(.*)', 
		component: () => import('./pages/errors/pagenotfound.vue')
	}
];

export default () => {
	
	
	const router = createRouter({
		history: createWebHashHistory(),
		routes,
		scrollBehavior(to, from, savedPostion){
			if(savedPostion) return savedPostion;
			return { top:0 }
		}
	});
	
	return router;
}
