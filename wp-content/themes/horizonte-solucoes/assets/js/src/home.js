import { Page } from './util/page';

// Import all components
import { Essentials } from './core/essentials';
import { Hero } from './components/hero';
import { Compare } from './components/compare';
import { Testimonials } from './components/testimonials';
import { VideoLightbox } from './components/video-lightbox';
import { Clientes } from './components/clientes';

// Initialize all components
new Page(
	Essentials.concat([
		Hero,
		Compare,
		Testimonials,
		VideoLightbox,
		Clientes
	])
);