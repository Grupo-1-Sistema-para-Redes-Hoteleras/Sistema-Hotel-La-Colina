export class Service{
	constructor(
		public id: string,
		public name: string,
        public icono: string,
        public imges: string[],
		public price: number,
        public status: string,
        public description: string,
        public id_Admin: string,
        public fecha_registro?: Date
		){}
}