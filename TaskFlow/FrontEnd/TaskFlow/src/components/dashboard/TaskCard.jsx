// Importa el modulo principal de react
import React from 'react';
// Importa el archivo CSS principal
import "../../index.css";

/**
 * Renders a task card component with the given background color, task number, title, course, and due date.
 *
 * @param {Object} props - The properties object containing the following properties:
 *   - {string} bgColor: The background color of the task card.
 *   - {number} number: The task number.
 *   - {string} title: The title of the task.
 *   - {string} course: The course associated with the task.
 *   - {string} dueDate: The due date of the task.
 * @return {JSX.Element} The task card component.
 */
export function TaskCard({bgColor, number, title, course, dueDate}) {
    return (   
        <div className={`${bgColor} p-4 md:p-6 rounded-3xl relative grid hover:scale-[0.97] hover:duration-700 md:grid-cols-[auto,1fr] items-center gap-4 md:gap-6`}>
        <p className="absolute top-2 left-0 rounded-full px-3 py-1 text-sm font-semibold">{number}</p>
        <div className="flex-1">
            <p className="md:text-lg text-xl font-normal mb-2">{title}</p>
            <p className="font-semibold mb-4">{course}</p>
            <p className="text-gray-700 font-semibold md:text-base text-sm">{dueDate}</p>
        </div>
    </div>
    );
}