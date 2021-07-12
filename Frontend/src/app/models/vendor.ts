export class Vendor{
	constructor(
		public id: string,
		public name: string,
		public lastname: string,
        public status: string,
        public email: string,
        public telf: string,
        public direction: string,
        public id_Admin: string,
        public fecha_registro?: Date
	){}
}