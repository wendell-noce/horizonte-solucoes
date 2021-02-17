// jQuery is imported externally

// Import all components
import { IE } from "../components/ie";
import { MobileMenu } from "../components/mobile-menu";
import { Header } from "../components/header";
import { DataBg } from "../components/data-bg";
import { LazyLoad } from "../components/lazy-load";
import { FloatingCta } from "../components/floating-cta";
import { TrackableLinks } from "../components/trackable-links";

// Export an array of essential components
export const Essentials = [
	IE,
	Header,
	MobileMenu,
	DataBg,
	FloatingCta,
];
