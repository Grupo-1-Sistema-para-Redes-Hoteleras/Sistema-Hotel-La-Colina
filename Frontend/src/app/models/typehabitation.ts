export class TypeHabitation{
	constructor(
		public id: string,
		public name: string,
        public status: string,
		public price: number,
        public imges: string[],
        public fecha_registro: Date
		){}
}