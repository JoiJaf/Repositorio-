import { Footer } from "../basics/Footer.jsx";
import { CourseContainer } from "../course/CourseContainer.jsx";

import { CoursesElements } from "../coursesElements/CoursesElements.jsx";


export function CoursesPage() {
    const events = [
        { "id": 1, "name": "UI/UX", "description": "The course is focused on the development of interactive applications using an object-oriented programming language, incorporating the utilization of n-tier architecture within the development of interactive web applications. Students must develop a final project, where a web-oriented application is created using the knowledge acquired in the course and in previous courses.", "image": "https://images.squarespace-cdn.com/content/v1/60794dbc8615125d3ad57026/adf94af6-7aab-4503-9569-527b9faec977/react1logo.png" },
        { "id": 2, "name": "React JS", "description": "The course is focused on the development of interactive applications using an object-oriented programming language, incorporating the utilization of n-tier architecture within the development of interactive web applications. Students must develop a final project, where a web-oriented application is created using the knowledge acquired in the course and in previous courses.", "image": "https://images.squarespace-cdn.com/content/v1/60794dbc8615125d3ad57026/adf94af6-7aab-4503-9569-527b9faec977/react1logo.png" },
        { "id": 3, "name": "Webflow", "description": "The course is focused on the development of interactive applications using an object-oriented programming language, incorporating the utilization of n-tier architecture within the development of interactive web applications. Students must develop a final project, where a web-oriented application is created using the knowledge acquired in the course and in previous courses.", "image": "https://images.squarespace-cdn.com/content/v1/60794dbc8615125d3ad57026/adf94af6-7aab-4503-9569-527b9faec977/react1logo.png" },
        { "id": 4, "name": "UI/UX", "description": "The course is focused on the development of interactive applications using an object-oriented programming language, incorporating the utilization of n-tier architecture within the development of interactive web applications. Students must develop a final project, where a web-oriented application is created using the knowledge acquired in the course and in previous courses.", "image": "https://images.squarespace-cdn.com/content/v1/60794dbc8615125d3ad57026/adf94af6-7aab-4503-9569-527b9faec977/react1logo.png" },
        { "id": 5, "name": "React JS", "description": "The course is focused on the development of interactive applications using an object-oriented programming language, incorporating the utilization of n-tier architecture within the development of interactive web applications. Students must develop a final project, where a web-oriented application is created using the knowledge acquired in the course and in previous courses.", "image": "https://images.squarespace-cdn.com/content/v1/60794dbc8615125d3ad57026/adf94af6-7aab-4503-9569-527b9faec977/react1logo.png" },
        { "id": 6, "name": "Webflow", "description": "The course is focused on the development of interactive applications using an object-oriented programming language, incorporating the utilization of n-tier architecture within the development of interactive web applications. Students must develop a final project, where a web-oriented application is created using the knowledge acquired in the course and in previous courses.", "image": "https://images.squarespace-cdn.com/content/v1/60794dbc8615125d3ad57026/adf94af6-7aab-4503-9569-527b9faec977/react1logo.png" }
    ]
    
    //<CourseContainer items={events} />
    return (
        <>
        
            <CourseContainer/>
            <Footer/>
            
        </>
    )
}