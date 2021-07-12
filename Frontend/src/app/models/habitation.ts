export class Habitation{
	constructor(
		public id: string,        
		public id_room_type: string,
		public price: number,
        public status: string,
        public number: number,
        public description?: string,
        public fecha_registro?: Date,
        public id_Admin?: string
	){}
}
