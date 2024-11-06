import { motion, useScroll, useMotionValueEvent } from "framer-motion";
import { useRef, useState } from "react";

export default function Header() {
    const [isHidden, setIsHidden] = useState(false);
  const { scrollY } = useScroll();
  const lastYRef = useRef(0);

  useMotionValueEvent(scrollY, "change", (y) => {
    const difference = y - lastYRef.current;
    if (Math.abs(difference) > 50) {
      setIsHidden(difference > 0);

      lastYRef.current = y;
    }
  });
  return (
    <motion.div
      animate={isHidden ? "hidden" : "visible"}
      whileHover="visible"
      onFocusCapture={() => setIsHidden(false)}
      variants={{
        hidden: {
          y: "-90%",
        },
        visible: {
          y: "0%",
        },
      }}
      transition={{ duration: 0.2 }}
      className="fixed right-0 top-0 z-[999] flex w-full justify-center pt-3"
    >
      <nav className="flex min-w-[60rem] justify-between px-16 gap-3 rounded-2xl bg-gray-200 p-5    *:px-7 *:py-2 *:transition-colors *:duration-300  focus-visible:*:bg-gray-200">
        <div className="w-44">
        <a href="#" className="bg-gray-200">
          <svg
            className="h-6 w-6"
            fill="currentColor"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5-10-5-10 5z"></path>
          </svg>
          <span className="sr-only">Home</span>
        </a>
        </div>
       <div className="flex flex-1 gap-12">
       <h2 className="text-lg cursor-pointer font-primary">Nous Sommes AllSmart</h2>
        <h2 className="text-lg font-primary">Expertises</h2>
        <h2 className="text-lg font-primary" >Réalisations</h2>
       </div>
       
        
      </nav>
    </motion.div>
  )
}
